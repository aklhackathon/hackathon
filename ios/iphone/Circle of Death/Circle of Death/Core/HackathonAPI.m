//
//  HackathonAPI.m
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "HackathonAPI.h"
#import "HAKObject.h"

#pragma mark - API URLs

static NSString *const kBaseURL     = @"http://localhost:3000";
static NSString *const kGameplayURL = @"/gameplay";
static NSString *const kRulesURL    = @"/rules";
static NSString *const kRulesetURL  = @"/ruleset";

@interface HackathonAPI ()

- (void)singletonInit;
- (NSString *)getURLForType:(RequestType)type;

@end

@implementation HackathonAPI

#pragma mark - Initialisers

+ (HackathonAPI *)instance
{
    static dispatch_once_t pred;
    static HackathonAPI *shared = nil;
    
    dispatch_once(&pred, ^{
        shared = [[super allocWithZone:NULL] init];
        [shared singletonInit];
    });
    
    return shared;
}

- (void)singletonInit
{
}

#pragma mark - Custom Functions

- (void)getObjectsOfType:(RequestType)type
          withParameters:(NSString *)params
                  method:(RequestMethod)method
          withCompletion:(void (^)(id results, NSError *error))completion
{
    NSString *url = [self getURLForType:type];
    
    if (url)
    {
        AFHTTPRequestOperationManager *manager = [[AFHTTPRequestOperationManager alloc] initWithBaseURL:[NSURL URLWithString:kBaseURL]];
        [manager GET:url parameters:params success:^(AFHTTPRequestOperation *operation, id responseObject)
         {
             completion(responseObject, nil);
         }
             failure:^(AFHTTPRequestOperation *operation, NSError *error)
         {
             completion(nil, error);
         }];
    }
    else
    {
        completion(nil, [NSError errorWithDomain:@"com.hackathon.circle-of-death"
                                            code:101
                                        userInfo:@{NSLocalizedDescriptionKey : @"Invalid type."}]);
    }
}

- (void)createObject:(HAKObject *)object
      withCompletion:(void (^)(id results, NSError *error))completion
{
    NSString *url = [self getURLForType:[object type]];
    
    if (url)
    {
        AFHTTPRequestOperationManager *manager = [[AFHTTPRequestOperationManager alloc] initWithBaseURL:[NSURL URLWithString:kBaseURL]];
        [manager POST:url parameters:[object generateParameters] success:^(AFHTTPRequestOperation *operation, id responseObject)
         {
             // need to check if succesful
             
             completion(responseObject, nil);
         }
              failure:^(AFHTTPRequestOperation *operation, NSError *error)
         {
             completion(nil, error);
         }];
    }
    else
    {
        completion(nil, [NSError errorWithDomain:@"com.hackathon.circle-of-death"
                                            code:101
                                        userInfo:@{NSLocalizedDescriptionKey : @"Invalid type."}]);
    }
}

+ (CardType)cardTypeForLetter:(NSString *)letter
{
    if ([letter isEqualToString:@"A"])
    {
        return CardTypeAce;
    }
    else if ([letter isEqualToString:@"2"])
    {
        return CardTypeTwo;
    }
    else if ([letter isEqualToString:@"3"])
    {
        return CardTypeThree;
    }
    else if ([letter isEqualToString:@"4"])
    {
        return CardTypeFour;
    }
    else if ([letter isEqualToString:@"5"])
    {
        return CardTypeFive;
    }
    else if ([letter isEqualToString:@"6"])
    {
        return CardTypeSix;
    }
    else if ([letter isEqualToString:@"7"])
    {
        return CardTypeSeven;
    }
    else if ([letter isEqualToString:@"8"])
    {
        return CardTypeEight;
    }
    else if ([letter isEqualToString:@"9"])
    {
        return CardTypeNine;
    }
    else if ([letter isEqualToString:@"10"])
    {
        return CardTypeTen;
    }
    else if ([letter isEqualToString:@"J"])
    {
        return CardTypeJack;
    }
    else if ([letter isEqualToString:@"Q"])
    {
        return CardTypeQueen;
    }
    else if ([letter isEqualToString:@"K"])
    {
        return CardTypeKing;
    }
    
    return CardTypeNone;
}

+ (CardType)cardTypeForNumber:(NSInteger)number
{
    return (CardType)number;
}

+ (NSString *)labelForCardType:(CardType)cardType
{
    switch (cardType)
    {
        case CardTypeAce:
        {
            return @"Ace";
            break;
        }
        case CardTypeJack:
        {
            return @"Jack";
            break;
        }
        case CardTypeQueen:
        {
            return @"Queen";
            break;
        }
        case CardTypeKing:
        {
            return @"King";
            break;
        }
        case CardTypeJoker:
        {
            return @"Joker";
            break;
        }
        case CardTypeTwo:
        case CardTypeThree:
        case CardTypeFour:
        case CardTypeFive:
        case CardTypeSix:
        case CardTypeSeven:
        case CardTypeEight:
        case CardTypeNine:
        case CardTypeTen:
        default:
        {
            return [[NSNumber numberWithInteger:(cardType + 1)] stringValue];
            break;
        }
    }
}

- (NSString *)getURLForType:(RequestType)type
{
    switch (type)
    {
        case RequestTypeGameplay:
        {
            return kGameplayURL;
            break;
        }
        case RequestTypeRuleset:
        {
            return kRulesetURL;
            break;
        }
        case RequestTypeRules:
        {
            return kRulesURL;
            break;
        }
        default:
        {
            break;
        }
    }
    
    return nil;
}

#pragma mark - Singleton

+ (id)allocWithZone:(NSZone *)zone
{
    return [self instance];
}

- (id)copyWithZone:(NSZone *)zone
{
    return self;
}

@end

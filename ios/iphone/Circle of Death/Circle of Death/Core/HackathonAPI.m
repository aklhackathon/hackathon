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

static NSString *const kGETGameplayURL  = @"http://hackathon.com/gameplay";
static NSString *const kGETRulesURL     = @"http://hackathon.com/rules";
static NSString *const kGETRulesetURL   = @"http://hackathon.com/ruleset";

@interface HackathonAPI ()

- (NSString *)getURLForType:(RequestType)type;

@end

@implementation HackathonAPI

#pragma mark - Initialisers

+ (HackathonAPI *)instance
{
    static dispatch_once_t pred;
    static HackathonAPI *shared = nil;
    
    dispatch_once(&pred, ^{
        shared = [[HackathonAPI alloc] init];
    });
    
    return shared;
}

- (id)init
{
    if (self = [super init])
    {
        
    }
    return self;
}

#pragma mark - Custom Fucnctions

- (void)getObjectsOfType:(RequestType)type
          withParameters:(NSString *)params
                  method:(RequestMethod)method
          withCompletion:(void (^)(NSArray *matches, NSError *error))completion
{
    NSString *url = [self getURLForType:type];
    
    if (url)
    {
        AFHTTPRequestOperationManager *manager = [AFHTTPRequestOperationManager manager];
        [manager GET:url parameters:params success:^(AFHTTPRequestOperation *operation, id responseObject)
         {
             completion(responseObject, nil);
         }
             failure:^(AFHTTPRequestOperation *operation, NSError *error)
         {
             completion(nil, error);
         }];
    }
    
    completion(nil, [NSError errorWithDomain:@"com.hackathon.circle-of-death"
                                        code:101
                                    userInfo:@{NSLocalizedDescriptionKey : @"Invalid type."}]);
}

- (void)createObject:(HAKObject *)object
      withCompletion:(void (^)(NSArray *matches, NSError *error))completion
{
    NSString *url = [self getURLForType:[object type]];
    
    if (url)
    {
        AFHTTPRequestOperationManager *manager = [AFHTTPRequestOperationManager manager];
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
    
    completion(nil, [NSError errorWithDomain:@"com.hackathon.circle-of-death"
                                        code:101
                                    userInfo:@{NSLocalizedDescriptionKey : @"Invalid type."}]);
}

- (NSString *)getURLForType:(RequestType)type
{
    switch (type)
    {
        case RequestTypeGameplay:
        {
            return kGETGameplayURL;
            break;
        }
        case RequestTypeRuleset:
        {
            return kGETRulesetURL;
            break;
        }
        case RequestTypeRules:
        {
            return kGETRulesURL;
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

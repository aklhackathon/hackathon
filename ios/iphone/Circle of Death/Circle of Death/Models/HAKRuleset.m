//
//  HAKRuleset.m
//  Circle of Death
//
//  Created by Sam Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "HAKRuleset.h"
#import "HAKCard.h"

@implementation HAKRuleset

- (id)init
{
    if (self = [super init])
    {
    }
    return self;
}

+ (instancetype)create
{
    return [[self alloc] init];
}

- (id)initWithJSON:(NSDictionary *)json
{
    if (self = [super initWithJSON:json])
    {
        NSArray *rule_matches = [json objectForKey:@"rule_matches"];
        NSMutableArray *cardObjects = [NSMutableArray array];
        for (NSDictionary *dict in rule_matches)
        {
            NSLog(@"dict: %@", dict);
            HAKCard *card = [HAKCard fromJSON:[dict objectForKey:@"card"]];
            [card setRule:[HAKRule fromJSON:[dict objectForKey:@"rule"]]];
            [cardObjects addObject:card];
        }
        self.cards = cardObjects;
    }
    return self;
}

+ (instancetype)fromJSON:(NSDictionary *)json
{
    return [[self alloc] initWithJSON:json];
}

#pragma mark - NSCoding support

- (void)encodeWithCoder:(NSCoder *)encoder
{
    [super encodeWithCoder:encoder];
    
    [encoder encodeObject:self.cards forKey:@"cards"];
}

- (id)initWithCoder:(NSCoder *)decoder
{
    if (self = [super initWithCoder:decoder])
    {
        self.cards = [decoder decodeObjectForKey:@"cards"];
    }
    return self;
}

#pragma mark - Custom Functions

- (NSDictionary *)generateParameters
{
    // TODO: incomplete
    return @{@"id" : self.identifier};
}

@end

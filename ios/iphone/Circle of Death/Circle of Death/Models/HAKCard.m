//
//  HAKCard.m
//  Circle of Death
//
//  Created by Sam Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "HAKCard.h"

@implementation HAKCard

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
        self.name   = [json objectForKey:@"name"];
        self.letter = [json objectForKey:@"letter"];
        self.rank   = [json objectForKey:@"rank"];
        self.rule   = [HAKRule fromJSON:[json objectForKey:@"rule"]];
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
    
    [encoder encodeObject:self.name     forKey:@"name"];
    [encoder encodeObject:self.letter   forKey:@"letter"];
    [encoder encodeObject:self.rank     forKey:@"rank"];
    
    [self.rule encodeWithCoder:encoder];
}

- (id)initWithCoder:(NSCoder *)decoder
{
    if (self = [super initWithCoder:decoder])
    {
        self.name   = [decoder decodeObjectForKey:@"name"];
        self.letter = [decoder decodeObjectForKey:@"letter"];
        self.rank   = [decoder decodeObjectForKey:@"rank"];
        self.rule   = [[HAKRule alloc] initWithCoder:decoder];
    }
    return self;
}

#pragma mark - Custom Functions

- (NSDictionary *)generateParameters
{
    return @{
             @"id"      : self.identifier,
             @"name"    : self.name,
             @"letter"  : self.letter,
             @"rank"    : self.rank
             };
}

@end

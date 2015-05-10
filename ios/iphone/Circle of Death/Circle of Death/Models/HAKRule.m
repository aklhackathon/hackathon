//
//  HAKRule.m
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "HAKRule.h"

@implementation HAKRule

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
        self.name               = [json objectForKey:@"name"];
        self.ruleDescription    = [json objectForKey:@"description"];
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
    
    [encoder encodeObject:self.name             forKey:@"name"];
    [encoder encodeObject:self.ruleDescription  forKey:@"description"];
}

- (id)initWithCoder:(NSCoder *)decoder
{
    if (self = [super initWithCoder:decoder])
    {
        self.name               = [decoder decodeObjectForKey:@"name"];
        self.ruleDescription    = [decoder decodeObjectForKey:@"description"];
    }
    return self;
}

#pragma mark - Custom Functions

- (NSDictionary *)generateParameters
{
    return @{
             @"id"          : self.identifier,
             @"name"        : self.name,
             @"description" : self.ruleDescription
             };
}

@end

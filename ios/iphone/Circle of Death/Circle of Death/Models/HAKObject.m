//
//  HAKObject.m
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "HAKObject.h"

@implementation HAKObject

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
    if (self = [super init])
    {
        self.identifier = [json objectForKey:@"id"];
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
    [encoder encodeObject:self.identifier forKey:@"id"];
}

- (id)initWithCoder:(NSCoder *)decoder
{
    if (self = [super init])
    {
        self.identifier = [decoder decodeObjectForKey:@"id"];
    }
    return self;
}

#pragma mark - Custom Functions

- (NSDictionary *)generateParameters
{
    return @{
             @"id" : self.identifier
             };
}

- (void)setType:(RequestType)type
{
    self.requestType = [NSNumber numberWithInt:type];
}

- (RequestType)type
{
    return [self.requestType intValue];
}

@end

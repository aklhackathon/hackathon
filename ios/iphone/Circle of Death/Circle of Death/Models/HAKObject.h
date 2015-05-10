//
//  HAKObject.h
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <Foundation/Foundation.h>
#import "Enums.h"
#import "HackathonAPI.h"

@class HackathonAPI;

@interface HAKObject : NSObject

@property (nonatomic, strong) NSString *identifier;
@property (nonatomic, strong) NSNumber *requestType;

+ (instancetype)create;
+ (instancetype)fromJSON:(NSDictionary *)json;

- (id)init;
- (id)initWithCoder:(NSCoder *)decoder;
- (id)initWithJSON:(NSDictionary *)json;
- (void)encodeWithCoder:(NSCoder *)encoder;

- (NSDictionary *)generateParameters;

- (void)setType:(RequestType)type;
- (RequestType)type;

@end

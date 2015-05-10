//
//  HAKRuleset.h
//  Circle of Death
//
//  Created by Sam Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "HAKObject.h"

@interface HAKRuleset : HAKObject

@property (nonatomic, strong) NSArray *cards;

+ (instancetype)create;
+ (instancetype)fromJSON:(NSDictionary *)json;

- (id)init;
- (id)initWithCoder:(NSCoder *)decoder;
- (id)initWithJSON:(NSDictionary *)json;
- (void)encodeWithCoder:(NSCoder *)encoder;

- (NSDictionary *)generateParameters;

@end

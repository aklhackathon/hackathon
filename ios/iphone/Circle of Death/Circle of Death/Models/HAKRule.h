//
//  HAKRule.h
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "HAKCard.h"
#import "HAKObject.h"

@interface HAKRule : HAKObject

@property (nonatomic, strong) NSString *name;
@property (nonatomic, strong) NSString *ruleDescription;

+ (instancetype)create;
+ (instancetype)fromJSON:(NSDictionary *)json;

- (id)init;
- (id)initWithCoder:(NSCoder *)decoder;
- (id)initWithJSON:(NSDictionary *)json;
- (void)encodeWithCoder:(NSCoder *)encoder;

- (NSDictionary *)generateParameters;

@end

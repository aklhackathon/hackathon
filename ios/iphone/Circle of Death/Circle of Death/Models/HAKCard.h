//
//  HAKCard.h
//  Circle of Death
//
//  Created by Sam Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "HAKRule.h"
#import "HAKObject.h"

@class HAKRule;

@interface HAKCard : HAKObject

@property (nonatomic, strong) NSString *name;
@property (nonatomic, strong) NSString *letter;
@property (nonatomic, strong) NSString *rank;
@property (nonatomic, strong) HAKRule *rule;

+ (instancetype)create;
+ (instancetype)fromJSON:(NSDictionary *)json;

- (id)init;
- (id)initWithCoder:(NSCoder *)decoder;
- (id)initWithJSON:(NSDictionary *)json;
- (void)encodeWithCoder:(NSCoder *)encoder;

- (NSDictionary *)generateParameters;

@end

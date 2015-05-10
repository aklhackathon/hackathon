//
//  HackathonAPI.h
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <AFNetworking/AFNetworking.h>
#import <Foundation/Foundation.h>
#import "Enums.h"
#import "HAKObject.h"

@class HAKObject;

@interface HackathonAPI : NSObject

+ (HackathonAPI *)instance;

- (void)getObjectsOfType:(RequestType)type
          withParameters:(NSString *)params
                  method:(RequestMethod)method
          withCompletion:(void (^)(id results, NSError *error))completion;

- (void)createObject:(HAKObject *)object
      withCompletion:(void (^)(id results, NSError *error))completion;

+ (CardType)cardTypeForLetter:(NSString *)letter;
+ (CardType)cardTypeForNumber:(NSInteger)number;
+ (NSString *)labelForCardType:(CardType)cardType;

@end

//
//  HackathonAPI.h
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <AFNetworking/AFNetworking.h>
#import <Foundation/Foundation.h>

typedef NS_ENUM(NSInteger, RequestMethod) {
    RequestMethodGET,
    RequestMethodPOST,
    RequestMethodPUT,
    RequestMethodUPDATE
};

typedef NS_ENUM(NSInteger, RequestType) {
    RequestTypeGameplay,
    RequestTypeRuleset,
    RequestTypeRules
};

@interface HackathonAPI : NSObject

+ (HackathonAPI *)instance;

- (void)getObjectsOfType:(RequestType)type
          withParameters:(NSString *)params
                  method:(RequestMethod)method
          withCompletion:(void (^)(NSArray *matches, NSError *error))completion;

@end

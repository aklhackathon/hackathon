//
//  Enums.h
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <Foundation/Foundation.h>

typedef NS_ENUM(NSInteger, CardType) {
    CardTypeAce,
    CardTypeTwo,
    CardTypeThree,
    CardTypeFour,
    CardTypeFive,
    CardTypeSix,
    CardTypeSeven,
    CardTypeEight,
    CardTypeNine,
    CardTypeTen,
    CardTypeJack,
    CardTypeQueen,
    CardTypeKing,
    CardTypeJoker,
    CardTypeNone = -1
};

typedef NS_ENUM(NSInteger, CardSuit) {
    CardSuitClubs,
    CardSuitDiamonds,
    CardSuitSpades,
    CardSuitHearts,
    CardSuitNone = -1
};

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

@interface Enums : NSObject

@end

//
//  CardView.h
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "HackathonAPI.h"
#import "HAKCard.h"

typedef NS_ENUM(NSInteger, ViewMode) {
    ViewModeMinimised,
    ViewModeMaximised
};

@interface CardView : UIView
{
    CardSuit cardSuit;
    CardType cardType;
    HAKCard *currentCard;
    ViewMode currentViewMode;
}

@property (weak, nonatomic) IBOutlet UILabel *smallNumberLbl;
@property (weak, nonatomic) IBOutlet UILabel *smallTitleLbl;
@property (weak, nonatomic) IBOutlet UILabel *largeNumberLbl;
@property (weak, nonatomic) IBOutlet UILabel *largeTitleLbl;
@property (weak, nonatomic) IBOutlet UILabel *descriptionLbl;

- (void)setCard:(HAKCard *)card;
- (void)setCardType:(CardType)type;
- (void)setCardSuit:(CardSuit)suit;

@end

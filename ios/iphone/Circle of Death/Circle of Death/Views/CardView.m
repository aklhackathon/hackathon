//
//  CardView.m
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "CardView.h"

@implementation CardView

- (void)awakeFromNib
{
    [self setClipsToBounds:YES];
    [self.layer setBorderColor:[UIColor lightGrayColor].CGColor];
    [self.layer setBorderWidth:1];
    [self.layer setCornerRadius:5];
}

- (void)setCard:(HAKCard *)card
{
    currentCard = card;
    [self setCardType:[HackathonAPI cardTypeForLetter:[currentCard letter]]];
}

- (void)setCardType:(CardType)type
{
    cardType = type;
    
    [self.smallNumberLbl setText:[currentCard name]];
    [self.smallTitleLbl setText:[[currentCard rule] name]];
    [self.largeNumberLbl setText:[currentCard name]];
    [self.largeTitleLbl setText:[[currentCard rule] name]];
    [self.descriptionLbl setText:[[currentCard rule] ruleDescription]];
}

- (void)setCardSuit:(CardSuit)suit
{
    cardSuit = suit;
}

@end

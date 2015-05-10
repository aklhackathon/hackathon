//
//  CardsListViewController.h
//  Circle of Death
//
//  Created by Sam Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "HAKRuleset.h"

@interface CardsListViewController : UIViewController <UIScrollViewDelegate>
{
    HAKRuleset *ruleset;
    NSMutableArray *cardViews;
}

@property (weak, nonatomic) IBOutlet UIScrollView *scrollView;

@property (weak, nonatomic) IBOutlet UIButton *backBtn;
@property (weak, nonatomic) IBOutlet UIButton *editBtn;

- (IBAction)viewAllCards:(id)sender;
- (IBAction)editRule:(id)sender;

@end

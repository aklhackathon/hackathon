//
//  CardsListViewController.h
//  Circle of Death
//
//  Created by Sam Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface CardsListViewController : UIViewController <UITableViewDataSource>
{
    NSArray *cards;
    NSArray *cardViews;
}

@end

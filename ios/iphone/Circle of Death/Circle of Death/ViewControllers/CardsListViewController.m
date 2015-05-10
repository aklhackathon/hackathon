//
//  CardsListViewController.m
//  Circle of Death
//
//  Created by Sam Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "CardsListViewController.h"
#import "CardView.h"

static NSString *kCardTableViewCell = @"MatchListCell";

@interface CardsListViewController ()

@end

@implementation CardsListViewController

- (void)viewDidLoad
{
    [super viewDidLoad];
    [self setupVariables];
    [self setupView];
}

- (void)setupVariables
{
    cards = [NSArray array];
}

- (void)setupView
{
    
}

@end

//
//  CardsListViewController.m
//  Circle of Death
//
//  Created by Sam Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <MBProgressHUD/MBProgressHUD.h>
#import "CardsListViewController.h"
#import "CardView.h"
#import "HackathonAPI.h"
#import "UIView+Extras.h"

static NSString *kCardTableViewCell = @"MatchListCell";

@interface CardsListViewController ()

- (void)setupVariables;
- (void)setupView;

@end

@implementation CardsListViewController

- (void)viewDidLoad
{
    [super viewDidLoad];
    [self setupVariables];
    [self setupView];
}

- (void)viewDidAppear:(BOOL)animated
{
    [super viewDidAppear:animated];
    
    [self downloadGameplay];
}

- (void)setupVariables
{
    cardViews = [NSMutableArray arrayWithCapacity:13];
}

- (void)setupView
{
    [self.backBtn setHidden:YES];
    [self.editBtn setHidden:YES];
    [MBProgressHUD showHUDAddedTo:self.scrollView animated:YES];
}

- (void)downloadGameplay
{
    [[HackathonAPI instance] getObjectsOfType:RequestTypeGameplay
                               withParameters:nil
                                       method:RequestMethodGET
                               withCompletion:^(id results, NSError *error) {
                                   
                                   ruleset = [HAKRuleset fromJSON:[results objectForKey:@"ruleset"]];
                                   
                                   if (ruleset && [ruleset cards].count > 0)
                                   {
                                       [self displayCards];
                                   }
        
    }];
}

- (void)displayCards
{
    dispatch_async(dispatch_get_global_queue( DISPATCH_QUEUE_PRIORITY_LOW, 0), ^{
        dispatch_async(dispatch_get_main_queue(), ^{
            [MBProgressHUD hideHUDForView:self.scrollView animated:YES];
        });
    });
    
    
    int i = 0;
    for (HAKCard *card in [ruleset cards])
    {
        CardView *view = [[[NSBundle mainBundle] loadNibNamed:@"CardView" owner:self options:nil] objectAtIndex:0];
        [view setCard:card];
        [view setFrame:CGRectMake(0, 20 + (i * 50), self.view.width, 55)];
        [cardViews addObject:view];
        [self.scrollView insertSubview:view atIndex:(100+i)];
        
        UITapGestureRecognizer *tapGesture = [[UITapGestureRecognizer alloc] initWithTarget:self action:@selector(showFullCardView:)];
        [view addGestureRecognizer:tapGesture];
        
        if (i == [ruleset cards].count - 1)
        {
            [self.scrollView setContentInset:UIEdgeInsetsMake(0, 0, 0, 0)];
            [self.scrollView setContentSize:CGSizeMake(self.scrollView.width, view.bottom - 5)];
        }
        
        i++;
    }
}

- (void)showFullCardView:(UITapGestureRecognizer *)sender
{
    [self.backBtn setAlpha:0];
    [self.backBtn setHidden:NO];
    [UIView animateWithDuration:0.6 animations:^{
        BOOL isBeforeSelectedCard = YES;
        for (CardView *view in cardViews)
        {
            if (view == [sender view])
            {
                [view setFrame:CGRectMake(0, self.backBtn.height + 5, view.width, self.scrollView.height - 5)];
                isBeforeSelectedCard = NO;
            }
            else if (isBeforeSelectedCard)
            {
                [view setFrame:CGRectMake(0, 0 - (self.view.height - 20), view.width, view.height)];
            }
            else
            {
                [view setFrame:CGRectMake(0, self.view.height, view.width, view.height)];
            }
        }
        [self.backBtn setAlpha:1];
        [self.scrollView setContentInset:UIEdgeInsetsMake(0, 0, 0, 0)];
        [self.scrollView setContentSize:CGSizeMake(self.scrollView.width, self.scrollView.height)];
    }];
}

#pragma mark - IBActions

- (IBAction)viewAllCards:(id)sender
{
    [UIView animateWithDuration:0.6 animations:^{
        int i = 0;
        for (CardView *view in cardViews)
        {
            [view setFrame:CGRectMake(0, 20 + (i * 50), self.view.width, 55)];
            
            if (i == [ruleset cards].count - 1)
            {
                [self.scrollView setContentInset:UIEdgeInsetsMake(0, 0, 0, 0)];
                [self.scrollView setContentSize:CGSizeMake(self.scrollView.width, view.bottom - 5)];
            }
            i++;
        }
        [self.backBtn setAlpha:0];
    } completion:^(BOOL finished) {
        [self.backBtn setHidden:YES];
    }];
}

- (IBAction)editRule:(id)sender
{
}
@end

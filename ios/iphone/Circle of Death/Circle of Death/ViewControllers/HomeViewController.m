//
//  HomeViewController.m
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "CardsListViewController.h"
#import "HomeViewController.h"
#import "UIView+Extras.h"
#import "UIColor+Extras.h"

@interface HomeViewController ()

- (void)setupVariables;
- (void)setupView;

@end

@implementation HomeViewController

- (void)viewDidLoad
{
    [super viewDidLoad];
    [self setupVariables];
    [self setupView];
}

- (void)setupVariables
{
    isShowingHelp = NO;
}

- (void)setupView
{
    [self.startBtn.layer setBorderColor:[UIColor codRedColor].CGColor];
    [self.startBtn.layer setBorderWidth:2];
    [self.startBtn.layer setCornerRadius:5];
}


- (IBAction)showHelp:(id)sender;
{
    if (!isShowingHelp)
    {
        UITapGestureRecognizer *tapGesture = [[UITapGestureRecognizer alloc] initWithTarget:self action:@selector(closeHelp)];
        
        self.overlay = [[UIView alloc] initWithFrame:self.view.frame];
        [self.overlay setAlpha:0];
        [self.overlay setBackgroundColor:[UIColor codOverlayColor]];
        [self.overlay addGestureRecognizer:tapGesture];
        [self.view insertSubview:self.overlay atIndex:98];
        
        self.helpView = [[[NSBundle mainBundle] loadNibNamed:@"HelpView" owner:self.helpView options:nil] objectAtIndex:0];
        [self.helpView setAlpha:0];
        [self.helpView setFrame:CGRectMake((self.view.width - self.helpView.width) / 2, (self.view.height - self.helpView.height) / 2, self.helpView.width, self.helpView.height)];
        [self.helpView.doneBtn addTarget:self action:@selector(closeHelp) forControlEvents:UIControlEventTouchUpInside];
        [self.view insertSubview:self.helpView atIndex:99];
        
        [UIView animateWithDuration:0.4 animations:^{
            [self.titleView setFrame:CGRectMake(self.titleView.left, self.helpView.top - self.titleView.height - 20, self.titleView.width, self.titleView.height)];
            [self.logoView setAlpha:0];
            [self.overlay setAlpha:1];
            [self.helpView setAlpha:1];
        } completion:^(BOOL finished) {
            isShowingHelp = YES;
        }];
    }
}

- (void)closeHelp
{
    if (isShowingHelp)
    {
        [UIView animateWithDuration:0.4 animations:^{
            [self.titleView setFrame:CGRectMake(self.titleView.left, self.introView.top - self.titleView.height - 16, self.titleView.width, self.titleView.height)];
            [self.logoView setAlpha:1];
            [self.overlay setAlpha:0];
            [self.helpView setAlpha:0];
        } completion:^(BOOL finished) {
            [self.overlay removeFromSuperview];
            [self.helpView removeFromSuperview];
            isShowingHelp = NO;
        }];
    }
}

- (IBAction)beginGame:(id)sender
{
    CardsListViewController *vc = [[CardsListViewController alloc] init];
    [self.navigationController pushViewController:vc animated:YES];
}

@end

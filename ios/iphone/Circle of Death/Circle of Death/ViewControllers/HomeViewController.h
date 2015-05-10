//
//  HomeViewController.h
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import <UIKit/UIKit.h>
#import "HelpView.h"

@interface HomeViewController : UIViewController
{
    BOOL isShowingHelp;
}

@property (weak, nonatomic) IBOutlet UIButton *helpBtn;
@property (weak, nonatomic) IBOutlet UIImageView *logoView;
@property (weak, nonatomic) IBOutlet UILabel *titleView;
@property (weak, nonatomic) IBOutlet UILabel *introView;
@property (weak, nonatomic) IBOutlet UIButton *startBtn;

@property (strong, nonatomic) UIView *overlay;
@property (strong, nonatomic) HelpView *helpView;

- (IBAction)showHelp:(id)sender;
- (IBAction)beginGame:(id)sender;

@end


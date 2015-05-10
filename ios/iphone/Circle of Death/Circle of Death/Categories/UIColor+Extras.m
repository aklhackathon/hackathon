//
//  UIColor+Extras.m
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "UIColor+Extras.h"

@implementation UIColor (Extras)

+ (UIColor *)codBackgroundColor
{
    return [UIColor colorWithRed:(0.21176470588235294) green:(0.21176470588235294) blue:(0.21176470588235294) alpha:1.0];
}

+ (UIColor *)codOverlayColor
{
    return [UIColor colorWithRed:(0.30980392156862746) green:(0.30980392156862746) blue:(0.30980392156862746) alpha:0.9];
}

+ (UIColor *)codRedColor
{
    return [UIColor colorWithRed:(0.9725490196078431) green:(0.396078431372549) blue:(0.34509803921568627) alpha:1.0];
}

@end

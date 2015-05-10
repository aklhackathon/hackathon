//
//  UIView+Extras.m
//  Circle of Death
//
//  Created by Aleks Beer on 10/05/15.
//  Copyright (c) 2015 Hackathon. All rights reserved.
//

#import "UIView+Extras.h"

@implementation UIView (Extras)

- (CGFloat)bottom
{
    return self.frame.origin.y + self.frame.size.height;
}

- (CGFloat)height
{
    return self.frame.size.height;
}

- (CGFloat)left
{
    return self.frame.origin.x;
}

- (CGFloat)right
{
    return self.frame.origin.x + self.frame.size.width;
}

- (CGFloat)top
{
    return self.frame.origin.y;
}

- (CGFloat)width
{
    return self.frame.size.width;
}

@end

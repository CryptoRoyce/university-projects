The Problem

Your company is writing an application to process digital photographs. Your part of the task is to identify an area around the cursor which will be magnified so details can be better viewed.

Design a program that, given the location of the cursor, displays the coordinates of the magnified area. Include tests to validate the input and display appropriate error message(s).

Specifications

Image size - 1024 (width) x 768 (height) pixels
Pixel (0,0) is located at the center of the image such that there are:
512 pixels to the left,
511 pixels to the right,
384 pixels below, and
383 pixels above.
Magnified area - a rectangle 235 (width) x 177 (height) pixels
The cursor will always be in the center of the magnified area
Input

Two integers, entered on the keyboard, identifying the (width, height) coordinates of the cursor.
Output

List the (width, height) coordinates of the corners of the rectangle.
Start at the upper right corner and go clockwise.
Align the data in columns.
Two possible scenarios

 	
Example (This sample data is provided so you can test your program. You should consider calculating additional data points to test.)

If the data is:

293 204

The output should be:

Top right     (410, 292)
Bottom right  (410, 116)
Bottom left   (176, 116)
Top left      (176, 292)
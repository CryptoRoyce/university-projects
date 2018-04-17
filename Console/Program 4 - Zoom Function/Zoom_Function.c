#include <stdio.h>
#include <stdlib.h>

int main(void)
{
    int x,y;						//Input variables
	int xR, xL, yT, yB;				//Top, Bot, Left, Right

    printf("Enter the coordinates separated by a space: ");
    scanf("%d %d", &x, &y);

    while(x > 511 || x < -512 || y > 383 || y < -384) 		//The magnified box size
	{
        printf("Invalid coordinates. Try again \n");		//If it's larger than the magnified box size, then have them start over.
        scanf("%d %d", &x, &y);
    }


	//The following if statements will be used to determine the coordinates of each corner.
	//We're finding them via calculating the distance between box side distance.
	
    if(x + 235/2 > 511) 
	{
        xR = 511;
        xL = 511 - 235/2;
    } else {
        xR = x + 235/2;
    }

    if(x - 235/2 < -512) 
	{
        xL = -512;
        xR = -512 + 235/2;
    } else { 
        xL = x - 235/2;
    }

    if(y + 177/2 > 383) 
	{
        yT = 383;
        yB = 383 - 177/2;
    } else {
        yT = y + 177/2;
    }

    if(y - 177/2 < -384) 
	{
        yB = -384;
        yT = -384 + 177/2;
    } else {
        yB = y - 177/2;
    }


	//Now connecting the information together, we can determine the coordinates of each corner.
	//The follwoing statements will display the results.


    printf("Top right    (%d,%d)\n", xR, yT);
    printf("Bottom right    (%d,%d)\n", xR, yB);
    printf("Bottom left    (%d,%d)\n", xL, yB);
    printf("Top left    (%d,%d)\n", xL, yT);

    return 0;
}

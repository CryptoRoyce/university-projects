#include<stdio.h>

int main(void)
{

	float a,b,c,x,y;						    		//Declare Variables for quadratic equation

	printf("Enter the values of a,b,c,x");				//Use this line to print to the screen
	scanf("%f %f %f %f",&a,&b,&c,&x);					//Use this line to get data from the keyboard

while (x!=0)											//Loop
 {
	y=(x*x*a) + (b*x)+c;
	printf("The Curve Point is x=%.3f and y=%.3f",x,y);	//Displaying the final results
	scanf("%f %f %f %f",&a,&b,&c,&x);					//Input the values again

}
					


	return 0;
} 

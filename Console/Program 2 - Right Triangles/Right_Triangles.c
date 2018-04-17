#include <stdio.h>
#include <time.h>
int main(void)
{
    int input;							//Will list all varaibles used
    int inputArr[input];				//inputArr will use the number stored in input
    int i,val,largest,smallest;
    int maxIndex, minIndex;
	float sum = 0.0;

    printf("Enter number: ");			
	scanf("%d",&input);					//Gets the quantity of numbers being generated
    printf("The array = {");			//Will display on the screen using the next block of code

   for(i=0; i<input; i++)
   {
      srand(time(0)+i);					//Random generates using time
      val=rand()%100;					//The amount of input numbers allowed
      inputArr[i] = val;				
      if(i==0) {						//Will only work if the person doesn't input 0
        largest = val;
        smallest = val;
        maxIndex = i;
        minIndex = i;
      } else {	
            if(val > largest) {			//Using i as the counter so can't end the else with return
                largest = val;
                maxIndex = i;
            }
            if(val < smallest) {
                smallest = val;
                minIndex = i;
            }
        }
      printf("%d",val);
      if(i != input-1) {					//Gets rid of the last comma
        printf(" ,");
      }
      sum += val;							//Average
   }
   printf("}\n");

   float mean =sum/input;

   printf("Mean = %.2f\n",mean);
   printf("Max = %d (index %d)\n", largest, maxIndex);
   printf("Min = %d (index %d)\n", smallest, minIndex);
   return 0;
}

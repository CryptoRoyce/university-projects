#include <stdio.h>
#include <stdlib.h>



int main(void){

	//processInput returns nothing.
	void processInput(double, int, char*);
    //Left side number 
    float decNum;
    //Right side number
    int numRepeating;
    //Holds current lines
    char linebuff[250];

	//Open the file
    FILE *fp = fopen("testData6.dat","r");
    
    //If the file does not exist, error out.
    if(fp == NULL) {
        printf("Error opening file.");
        return(0);
    }

    //Column Headers
    printf("Number                 Numerator      Denominator\n");
    

    while(fgets(linebuff, sizeof(linebuff), fp)){
        //Storing the line as a pointer.
        char* lineAsBuff = linebuff;
        //Finding the spaces.
        int indexOfSpace = 0;
        while(lineAsBuff[indexOfSpace] != ' ') {
		//Keeping increasing until we find the space.
            indexOfSpace++;
        }
        //Read the current line and store the values.
        sscanf(linebuff,"%f %d", &decNum, &numRepeating);
        
		//This array is to store the last n digits where n is numRepeating.
        char lastN[numRepeating + 1];

        int i;
        
		//This loop is for initiallizing the lastN array.
        for(i = 0; i < numRepeating; i++) {
            lastN[i] = lineAsBuff[indexOfSpace - numRepeating + i];
        }
        
        //Terminate it with end of line.
        lastN[i] = '\0';
        
		//Have to loop it again, but this time we're going to put the bar when it goes.
        for(i = 0; i < indexOfSpace; i++) {
            if(indexOfSpace - i <= numRepeating) {
                printf("_");
            } else {
                printf(" ");
            }
        }

		//I have to print a new line because the bar goes on top.
        printf("\n");
        //Print out the number.
        for(i = 0; i < indexOfSpace; i++) {
            printf("%c",lineAsBuff[i]);
        }

		//Column size 20.
        while(i < 20) {
            printf(" ");
            i++;
        }
        
        //Finds the placement for the dot.
        int indexOfDot = 0;
        while(lineAsBuff[indexOfDot] != '.') {
            indexOfDot++;
        }

        
		//This will be the index of the first time when it had started to repeat.
        int indexOfFirstRep = 0;
        int j;
        for(i = indexOfDot + 1; i < indexOfSpace; i++) {
            for(j = i; j < i + numRepeating; j++) {
                //Checking for inequality.
                if(lineAsBuff[j] != lastN[j - i]) {
                   break;
                   //Inequality is bad, so end the loop.
                } else if(j == i + numRepeating - 1) {
                    indexOfFirstRep = i;
                    //Now we know what the answer will be.
                }
            }
            if(indexOfFirstRep) {
                break;
                //End it because we found the answer.
            }
        }

		//Algorithm for the calculations of the denomerator and numerator.
        int denominator = 9;
        for(i = 1; i < numRepeating; i++) {
            denominator *= 10;
            denominator += 9;
        }

        int multiplyBy = 1;
        for(i = indexOfDot; i < indexOfFirstRep - 1; i++) {
            denominator *= 10;
            multiplyBy *= 10;
        }
        int numerator = decNum * multiplyBy;
        numerator *= denominator/10;
        
        //Repeating part as integer. Yes, I know we have not went over this is class. It's similar in C++ though and I found it while doing some research.
        int repeatingPart = atoi(lastN);
        
        numerator += repeatingPart;
        printf("%11d",numerator);
        printf("%18d\n",denominator);
    }
    fclose(fp);

    return 0;
}

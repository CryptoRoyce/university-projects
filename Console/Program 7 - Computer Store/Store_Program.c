#include <stdio.h>
#include <stdlib.h>

int main(void){



/*


		 SINGLE PRODUCT COST



*/


		 float singleDesktop;
		 float singleLaptop;
		 float singleDockingStation;
		 float singleInkjetPrinter;
		 float singleLaserPrinter;
		 float singleMonitor;
		 float singleDualMonitor;


/*


		 PRODUCT NAMES



*/


		 char *wordDesktop = "Desktop";
		 char *wordLaptop = "Laptop";
		 char *wordDockingStation = "Docking Station";
		 char *wordInkjetPrinter = "Inkjet Printer";
		 char *wordLaserPrinter = "Laser Printer";
		 char *wordMonitor = "Monitor";
		 char *wordDualMonitor = "Dual Monitor";


/*


		 PRODUCT QUANTITY



	*/



		 char* numName = malloc(sizeof(char)*256);

		 int numLaptop,numDesktop;
		 int numLaserPrinter,numInkjetPrinter;
		 int numMonitor,numDualMonitor;
		 int numDockingStation;



/*


		 PRODUCT COST



*/


		 float numLaptopCost = 0;
		 float numDesktopCost = 0;
		 float numLaserPrinterCost = 0;
		 float numInkjetPrinterCost = 0;
		 float numMonitorCost = 0;
		 float numDualMonitorCost = 0;
		 float numDockingStationCost = 0;



/*


		 EXTRAS



*/

		 float subTotal;
		 float salesTax;
		 float totalCost;
		 float numCost;       //Total before discount and taxes
		 float numDiscount = 0;     //Discount Total
		 float numDiscount1 = 0;
		 float numDiscount2 = 0;


/*


		 OPEN PURCHASES.DAT



*/



		    FILE *fp = fopen("purchases.dat","r");

		    if(fp == NULL) {

		        printf("Error opening file.");
		        return 0;

		    }



/*


		 PRODUCTS INPUTTED INTO VARIABLES



*/

		  char linebuff[256];

		  FILE *DATA = fopen("AlexanderRoyce.txt","w");

		 while(fgets(linebuff, sizeof(linebuff), fp)){
		    char* lineAsBuff = linebuff;
		    sscanf(lineAsBuff,"%[^,],%d,%d,%d,%d,%d,%d,%d",numName,&numLaptop,&numDesktop,&numLaserPrinter,&numInkjetPrinter,&numMonitor,&numDualMonitor,&numDockingStation);

/*


		 NO PURCHASES



*/


		 if (numLaptop && numDesktop && numLaserPrinter && numInkjetPrinter && numMonitor && numDualMonitor && numDockingStation == 0){
		  printf("No Purchases.\n");
		  return 0;
		 }



/*


		 PRODUCT COST * QUANITITY


*/


		 if (numLaptop >= 0) {
		  numLaptopCost = numLaptop * 525;
		 }
		 if (numDesktop >= 0) {
		  numDesktopCost = numDesktop * 600;
		 }

		 if (numLaserPrinter >= 0) {
		  numLaserPrinterCost = numLaserPrinter * 350;
		 }

		 if (numInkjetPrinter >= 0) {
		  numInkjetPrinterCost = numInkjetPrinter * 175;
		 }

		 if (numMonitor >= 0) {
		  numMonitorCost = numMonitor * 150;
		 }

		 if (numDualMonitor >= 0) {
		  numDualMonitorCost = numDualMonitor * 200;
		 }

		 if (numDockingStation >= 0) {
		  numDockingStationCost = numDockingStation * 75;
		 }

/*


		 TOTAL BEFORE DISCOUNT


*/

		 numCost = numLaptopCost+numDesktopCost+numLaserPrinterCost+numInkjetPrinterCost+numMonitorCost+numDualMonitorCost+numDockingStationCost;



/*


		 PACKAGE DEALS


*/


		 if (numDesktop > 0 && numMonitor > 0 && (numLaserPrinter > 0 || numInkjetPrinter > 0)){
		  numDiscount1 = numCost * .05;
		 }

		 if (numLaptop > 0 && (numLaserPrinter > 0 || numInkjetPrinter > 0)){
		  numDiscount2 = numCost * .05;
		 }

		 if (numDiscount1 > 0 && numDiscount2 > 0){
		  numDiscount2 = 0;
		 }

		 if (numDiscount1 > 0 || numDiscount2 > 0){
		  numDiscount = numDiscount1+numDiscount2;
		 }


/*

		 SUBTOTAL

*/

		 subTotal = numCost - numDiscount;


/*

		 SALES TAX 3.5%

*/

		 salesTax = subTotal * .035;

/*

		 TOTAL

*/


		 totalCost = subTotal + salesTax;




/*


		 SINGLE QUANITITY PRICES


*/

		 singleLaptop = 525;
		 singleDesktop = 600;
		 singleDockingStation = 350;
		 singleInkjetPrinter = 175;
		 singleLaserPrinter = 150;
		 singleMonitor = 200;
		 singleDualMonitor = 75;



/*


		 DISK CREATION


*/




		  fprintf(DATA,"%s\n",numName);
		  fprintf(DATA,"\nQty	Item			Unit Cost	Extended Cost\n");
					                            
		  if (numLaptop > 0){
		  	fprintf(DATA," %d	",numLaptop);
			fprintf(DATA,	"%s",wordLaptop);
			fprintf(DATA,"			%.2f",singleLaptop);
			fprintf(DATA,"		%.2f\n",numLaptopCost);
		  }

		  if (numDesktop > 0){
		  	fprintf(DATA," %d	",numDesktop);
			fprintf(DATA,	"%s",wordDesktop);
			fprintf(DATA,"			%.2f",singleDesktop);
			fprintf(DATA,"		%.2f\n",numDesktopCost);
		  }

		  if (numMonitor > 0){
		  	fprintf(DATA," %d	",numMonitor);
			fprintf(DATA,	"%s",wordMonitor);
			fprintf(DATA,"			%.2f",singleMonitor);
			fprintf(DATA,"		%.2f\n",numMonitorCost);
		  }

		  if (numDualMonitor > 0){
		  	fprintf(DATA," %d	",numDualMonitor);
			fprintf(DATA,	"%s",wordDualMonitor);
			fprintf(DATA,"		%.2f",singleDualMonitor);
			fprintf(DATA,"		%.2f\n",numDualMonitorCost);
		  }

		  if (numInkjetPrinter > 0){
		  	fprintf(DATA," %d	",numInkjetPrinter);
			fprintf(DATA,	"%s",wordInkjetPrinter);
			fprintf(DATA,"		%.2f",singleInkjetPrinter);
			fprintf(DATA,"		%.2f\n",numInkjetPrinterCost);
		  }

		  if (numLaserPrinter > 0){
		  	fprintf(DATA," %d	",numLaserPrinter);
			fprintf(DATA,	"%s",wordLaserPrinter);
			fprintf(DATA,"		%.2f",singleLaserPrinter);
			fprintf(DATA,"		%.2f\n",numLaserPrinterCost);
		  }

		  if (numDockingStation > 0){
		  	fprintf(DATA," %d	",numDockingStation);
			fprintf(DATA,	"%s",wordDockingStation);
			fprintf(DATA,"		%.2f",singleDockingStation);
			fprintf(DATA,"		%.2f\n",numDockingStationCost);
		  }




		  fprintf(DATA,"        Discount                %.2f\n",numDiscount);
		  fprintf(DATA,"    	Subtotal                %.2f\n",subTotal);
		  fprintf(DATA,"    	Sales tax (3.5)         %.2f\n",salesTax);
		  fprintf(DATA,"    	Total                   %.2f\n",totalCost);

		  if (numDockingStation > 0 && numLaptop == 0){
		   fprintf(DATA,"You must purchase a laptop, if you want a docking station.\n");
		  }

		  if (numDualMonitor > 0 && numMonitor == 0){
		   fprintf(DATA,"You must purchase a single monitor, if you want the dual monitor package.\n");
		  }

		  fprintf(DATA,"------------------------------\n");









		 }

		printf("Check the AlexanderRoyce.dat file!\n");
		fclose(DATA);
		fclose(fp);         //Close the first file

	return 0;
}

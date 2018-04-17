#include<stdio.h>
#include<conio.h>
#include<string.h>


int main(void)

{
   char table[26][26];
   const int ENCRYPT=1, DECRYPT=2;
   int mode;
   char key[81], plaintext[81], ciphertext[81], ch;

   for (int i=0; i<26; i++)
      for (int j=0,k=i; j<26; j++, k++)
         table[i][j] = 'A' + k % 26;

   scanf("%d",&mode);
   while (mode == ENCRYPT || mode == DECRYPT){
      do {ch = scanf("%d",&mode);} while (ch!='\n');
      scanf(key, 80, '\n');
      for (int i=0; i= 'A' && key[i] <= 'Z';)
               key[j++] = key[i++];
            else
               i++;
         }
         key[j] = 0;
      }
      switch (mode){
         case ENCRYPT:
            stdin.getline(plaintext, 80, '\n');
	    for (int i=0; i= 'A' && plaintext[i] <= 'Z')
                     ch = table[plaintext[i]-'A'][key[j++]-'A'];
                  else if (plaintext[i] == ' ')
                     ch = ' ';
                  else {
                     ch = plaintext[i];
                     j = 0;
                  }
                  j %= strlen(key);
                  printf() << ch;
               }
               printf() << endl;
            }
            break;
         case DECRYPT:
            stdin.getline(ciphertext, 80, '\n');
            {
               int i , j, row, col;
               for (i=0,j=0; i= 'A' && ciphertext[i] <= 'Z'){
                     col = key[j++] - 'A';
                     row = 0;
                     while (table[row][col] != ciphertext[i])
                        row++;
                     ch = row + 'A';
                  } else if (ciphertext[i] == ' ')
                     ch = ' ';
                  else {
                     ch = ciphertext[i];
                     j = 0;
                  }
                  j %= strlen(key);
                  printf() << ch;
               }
               printf() << endl;
            }
      }
      scanf("%d",&mode);
   }
   return 0;
}
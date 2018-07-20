function [ Vect_lm ] = leg_mom(Image)
N=32;
M=128;
load l_pol_xy_32_128;
[ Image ] = rectangle_minimal(Image);
ordre=10;
Image=imresize(Image,[32 128]);
b=[]; 

for n=1:ordre
     for m=1:ordre
         
            b1=leg_mom_fct(Image,pol_x,pol_y,n,m);
            b=[b,b1];  
     end
end
 
Vect_lm=b';
 
end

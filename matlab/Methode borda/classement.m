%fonction de classement
function [D]=classement(D)
[L,C]=size(D);
Dm=D;
for i=1:L
   for j=1:C
       min=count_min(D(i,:)',D(i,j));
       Dm(i,j)=min;
   end
end
D=Dm;
end
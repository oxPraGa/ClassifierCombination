%fonction de classement
function [D]=crisp(D)
[L,C]=size(D);
Dm=zeros(L,C);
for i=1:L
       [~,classe]=max(D(i,:));
       Dm(i,classe)=1;
end
D=Dm;
end
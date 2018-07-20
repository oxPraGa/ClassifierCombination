function [ pos ] = chercherPos(D,unts,R)
[L,C]=size(D);
nbc = C^L ; % nombre des collonnes de unités 

for i=1:nbc
    U = unts(1:L,i);
    if (U == R)
        pos=i;
        break;
    end
end

end


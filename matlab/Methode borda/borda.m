%fonction de borda count
function [classe,bel,D]=borda(D)
[L,C]=size(D);
D=abs(D-ones(L,C));
D=classement(D);
for i=1:C
    somme=0;
    for j=1:L,
        somme=somme+D(j,i);
    end
    Vsomme(i)=somme;
end
MIN=Vsomme(1);
classe=1;
for i=2:C
    if(MIN>Vsomme(i))
        classe=i;
        MIN=Vsomme(i);
    end
end
bel=1-MIN/C;
end % borda()
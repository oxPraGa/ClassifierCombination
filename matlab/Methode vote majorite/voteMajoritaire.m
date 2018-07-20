%fonction de vote majoritaire
function [classe,bel,D]=voteMajoritaire(D)
[L,C]=size(D);
D=crisp(D);

for i=1:C
    somme=0;
    for j=1:L,
        somme=somme+D(j,i);
    end
    Vsomme(i)=somme;
end

MAX=Vsomme(1);
classe=1;
for i=2:C
    if(MAX<Vsomme(i))
        classe=i;
        MAX=Vsomme(i);
    end
end
bel=MAX/L;

end % voteMajoritaire()
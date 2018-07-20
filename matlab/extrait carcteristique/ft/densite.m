function [ Densite ] = densite(Image)
[x y]=size(Image);
Densite = nnz(Image)/(x*y);
%Densite = sum(sum(Image))/(Size(1)*Size(2));
end %[ Densite ] = densite(Image);


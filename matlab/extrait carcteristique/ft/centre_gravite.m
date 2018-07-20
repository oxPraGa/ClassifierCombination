function [ Centre_gravite ] = centre_gravite(Image)

Centre_gravite =[0 0];
[X Y]=find(Image);
if densite(Image)~= 0
Centre_gravite = round([mean(X) mean(Y)]);
end
end


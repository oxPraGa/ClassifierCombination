function [ classe,sortie ] = nn_ft( Vect_ft,net)

sortie = sim(net, Vect_ft )';
[~,classe]=max(sortie);

end


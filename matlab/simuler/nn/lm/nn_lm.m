function [ classe,sortie ] = nn_lm( Vect_lm,net)

sortie = sim(net, Vect_lm )';
[~,classe]=max(sortie);

end


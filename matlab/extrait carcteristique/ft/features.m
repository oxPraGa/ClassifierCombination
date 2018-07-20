function [ Vect_ft ] = features(Image)

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
% on met l'image au rectangle minimal              %
% fenetrage: on decoupe l'image a des fenetres     %
% pour chaque fenetre                              %
%  -mettre la fenetre au rentangle minimal         %
%  -tracer le contour                              %
%  -calculer le centre de gravite                  %
%  -calculer les derections de freeman             %
%  -claculer la densite                            %
%  -calculer les transitions                       %
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%

%largeur de la fenetre et le chevachement
Nb_fenetres=4;
Chevachement=3;

%rectangle minimal de l'image
Image=rectangle_minimal(Image);

%decouper l'image a des fenetres
Fenetres=fenetrage(Image,Nb_fenetres,Chevachement);
ft=[];
%pour chaque fenetre
for i=1:Nb_fenetres
   %mettre la fenetre au rentangle minimal
   Fnt_min=rectangle_minimal(Fenetres{i});
   %tracer le contour de la fenetre
   Contour=contour(Fnt_min);
   %calculer le centre de gravite de la fenetre
   Centre_gravite=centre_gravite(Contour);
   %calculer les intersection du contour avec derections de freeman et les distances
   Intersection_distance=intersection_distance(Contour,Centre_gravite);
   %claculer la densite
   [Densite Transitions]=densite_transition(Fenetres{i});
   ft=[ft Densite Transitions Intersection_distance];
end
Vect_ft=ft';

end %[ Vect_ft ] = features(Image)


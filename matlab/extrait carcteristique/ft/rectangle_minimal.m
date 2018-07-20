function [ Rect_min ] = rectangle_minimal(Image)

% find retourne les X et les Y des valeurs differentes de 0  
% le rectangle minimal commence horizantalement de min y jusqu'au max y
% et verticalement de min x jusqu'au max x

[X Y]=find(Image);
Rect_min=Image(min(X):max(X),min(Y):max(Y));

end %[ Rect_min ] = rectangle_minimal(Image)


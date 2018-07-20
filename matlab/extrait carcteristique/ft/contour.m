function [Contour]= contour(image)
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%pour tracer le contour on met les limites    %
%horizontales et verticales a 2 puis on efface%
%la sufaces des 1 et on met les 2 a des 1     %
%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
[x y]=size(image);
image=double(image); %pour pouvoir parcourir le matrice de l'image il faut qu'il soint en double

%tracer les limites horizontales
for i=1:x
    if( image(i,1)==1 )
         image(i,1)=2;
    end
    if( image(i,y)==1 )
         image(i,y)=2;
    end
   for j=1:y-1
      if( image(i,j)==1 && image(i,j+1)==0) 
         image(i,j)=2;
      end
     
     if  (image(i,j)==0 && image(i,j+1)==1)  
         image(i,j+1)=2;
      end
   end
end

%tracer les limites verticales
for j=1:y
    if( image(1,j)==1 )
         image(1,j)=2;
    end
    if( image(x,j)==1 )
         image(x,j)=2;
    end
   for i=1:x-1
      if (image(i,j)==1 && image(i+1,j)==0 )
         image(i,j)=2;
      end
      if (image(i,j)==0 && image(i+1,j)==1) 
         image(i+1,j)=2;
      end
   end
end

%effacer la surface et dissiner le contour
for i=1:x
   for j=1:y
      if image(i,j)==1 
         image(i,j)=0;
      elseif image(i,j)==2
          image(i,j)=1;
      end
   end
end
Contour=logical(image);

end % [Contour]=contour(image);
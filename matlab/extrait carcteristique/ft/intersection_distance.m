function [ Intersection_distance ] = intersection_distance(Contour,Centre_gravite)
[x y]=size(Contour);
a= Centre_gravite(1);
b= Centre_gravite(2);

i=a;
j=b;
Nb_intersection=zeros(4,1);
Distance=zeros(4,1);
%les intersections et les distances pour le 1er diagonal
while (i>0 && j<y)
    if (Contour(i,j)==1)
        Nb_intersection(1,1)=Nb_intersection(1,1)+1;
        Distance(1,1)= sqrt((a-i)^2+(b-j)^2);
    elseif (i-1 > 0 && Contour(i-1,j)==1 )
        Nb_intersection(1,1)=Nb_intersection(1,1)+1;
        Distance(1,1)= sqrt((a-(i-1))^2+(b-j)^2);
    elseif  ( j<y-1 && Contour(i,j+1)==1 )
        Nb_intersection(1,1)=Nb_intersection(1,1)+1;
        Distance(1,1)= sqrt((a-i)^2+(b-(j+1))^2);
    end
    
    i=i-1;
    j=j+1;
end

%les intersections et les distances pour le 2eme diagonal
i=a;
j=b;
while (i>0 && j>0)
    if (Contour(i,j)==1)
        Nb_intersection(2,1)=Nb_intersection(2,1)+1;
        Distance(2,1)= sqrt((a-i)^2+(b-j)^2);
    elseif (i-1>0 && Contour(i-1,j)==1)
        Nb_intersection(2,1)=Nb_intersection(2,1)+1;
        Distance(2,1)= sqrt((a-(i-1))^2+(b-j)^2);
    elseif ( j-1 > 0 && Contour(i,j-1)==1 )
        Nb_intersection(2,1)=Nb_intersection(2,1)+1;
        Distance(2,1)= sqrt((a-i)^2+(b-(j-1))^2); 
    end
    
    i=i-1;
    j=j-1;
end

%les intersections et les distances pour le 3eme diagonal
i=a;
j=b;
while ( i<x && j>0 ) 
    
    if ( Contour(i,j)==1 )
        Nb_intersection(3,1)=Nb_intersection(3,1)+1;
        Distance(3,1)= sqrt((a-i)^2+(b-j)^2);
    elseif (i+1 < x && Contour(i+1,j)==1)
        Nb_intersection(3,1)=Nb_intersection(3,1)+1;
        Distance(3,1)= sqrt((a-(i+1))^2+(b-j)^2);
    elseif (j-1 >0 && Contour(i,j-1)==1)
        Nb_intersection(3,1)=Nb_intersection(3,1)+1;
        Distance(3,1)= sqrt((a-i)^2+(b-(j-1))^2);
    end
    
 i=i+1;
 j=j-1;
end

%les intersections et les distances pour le 4eme diagonal
i=a;
j=b;
while ( i<x && j<y )  
    
    if (Contour(i,j)==1)
        Nb_intersection(4,1)=Nb_intersection(4,1)+1;
        Distance(4,1)= sqrt((a-i)^2+(b-j)^2);
    elseif ( i+1<x && Contour(i+1,j)==1 )
        Nb_intersection(4,1)=Nb_intersection(4,1)+1;
        Distance(4,1)= sqrt((a-(i+1))^2+(b-j)^2);
    elseif ( j+1<y && Contour(i,j+1)==1 )
        Nb_intersection(4,1)=Nb_intersection(4,1)+1;
        Distance(4,1)= sqrt((a-i)^2+(b-(j+1))^2);
    end
    
 i=i+1;
 j=j+1;
end

%ordenner les sortie
Intersection_distance = zeros(1,size(Nb_intersection,1)*2);
i=1;
j=1;
while ( i <= size(Intersection_distance,2) )
     Intersection_distance(i)=Nb_intersection(j,1);
     Intersection_distance(i+1)=Distance(j,1);
     i=i+2;
     j=j+1;
end

end %intersection_distance(Contour,Centre_gravite)


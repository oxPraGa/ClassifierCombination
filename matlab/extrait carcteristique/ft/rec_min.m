function [ bb ] = rec_min( im )
%UNTITLED4 Summary of this function goes here
%   Detailed explanation goes here

[x y]=find(im);
xmin=min(x);
ymin=min(y);
xmax=max(x);
ymax=max(y);
bb=zeros(xmax-xmin,ymax-ymin);
bb=im(xmin:xmax,ymin:ymax);
end


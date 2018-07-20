function mom=leg_mom_fct(img,pol_x,pol_y,n,m)
[N,M]=size(img);
norm=((2*n+1)*(2*m+1))/((N-1)*(M-1));
mom=0;
for x=1:N
    for y=1:M
        
        if img(x,y)==1
            p_x=pol_x(n,x);
            p_y=pol_y(m,y);
            mom=mom+p_x*p_y;
        end
    end
end
mom=norm*mom;
end
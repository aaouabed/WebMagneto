

let C1=[29,52,22];
let C2=[53,80,67];

var v1,v2,v3;

var deltaE;

v1=C2[0]-C1[0];
v2=C2[1]-C1[1];
v3=C2[2]-C1[2];
deltaE =Math.sqrt((v1*v1) + (v2 * v2)+  (v3 * v3));

console.log(deltaE)
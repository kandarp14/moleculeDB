NSiteTypes  =  1


SiteType   =  LJ126
NSites   =  4


#S1
SiteID   =  1
x   =  0.0
y   =  0.0
z   =  0.0
sigma   =  3.905
epsilon   =  88.1
mass   =  15.0347

#S2
SiteID   =  2
x   =  1.53
y   =  0.0
z   =  0.0
sigma   =  3.905
epsilon   =  59.4
mass   =  14.0268

#S3
SiteID   =  3
x   =  2.10315
y   =  1.41859
z   =  0.0
sigma   =  3.905
epsilon   =  59.4
mass   =  14.0268

#S4
SiteID   =  4
x   =  3.63315
y   =  1.41859
z   =  0.0
sigma   =  3.905
epsilon   =  88.1
mass   =  15.0347

NRotAxes   =   auto

NIdfTypes  =  3

IdfType  =  Bond
NIdfs  =  2

Bond  =  2 3
R0  =  1.535
ForConst  =  1000000

Bond  =  3 4
R0  =  1.535
ForConst  =  1000000

IdfType  =  Angle
NIdfs  =  2

Angle  =  1 2 3
Angle0  =  112
ForConst  =  62500

Angle  =  2 3 4
Angle0  =  112
ForConst  =  62500

IdfType  =  Dihedral
NIdfs  =  1

Dihedral  =  1 2 3 4
nmax  =  3
ForConst0  =  1031.36
gamma00  =  0
ForConst1  =  2037.82
gamma01  =  0
ForConst2  =  158.52
gamma02  =  0
ForConst3  =  -3227.7
gamma03  =  0
ScaleLJ14  =  0.0625
ScaleEl14  =  0.5

NConstrU  =  1

ConstrU  =  1 2
Constraint  =  2
NRotAxes   =   auto

NRotAxes   =   auto

#!/bin/bash

# Archivos que se van a buscar y eliminar en produccion, poscionar el script en la carpeta html
files=(
'REG14-1591921035.9986*'
'REG14-1591921579.8805*'
'REG14-1591922094.8933*'
'REG14-1591922417.7175*'
'REG14-1591922718.3769*'
'REG14-1591922998.9423*'
'REG14-1591923273.3255*'
'REG14-1591923610.6813*'
'REG14-1591924132.4171*'
'REG14-1591924622.189*'
'REG9-1591831175.6817*'
'REG9-1591832317.5544*'
'REG9-1591985426.0892*'
'REG9-1591986078.3021*'
'REG9-1591986468.0498*'
'REG9-1591986987.3245*'
'REG9-1591987400.4836*'
'REG9-1591987784.5632*'
'REG9-1591988045.098*'
'REG9-1591988281.4192*'
'REG9-1591988628.4187*'
'REG9-1591988840.2362*'
'REG9-1591989168.3189*'
'REG9-1591989489.0434*'
'REG9-1591989864.1186*'
'REG9-1591990148.7198*'
'REG9-1591990707.7737*'
'REG9-1592243816.319*'
'REG9-1592244381.4956*'
'REG9-1592244917.9653*'
'REG9-1592245253.3641*'
'REG9-1592245570.2201*'
'REG9-1592246155.2518*'
'REG9-1592246711.8226*'
'REG9-1592247067.0198*'
'REG9-1592248375.8926*'
'REG9-1592248665.1878*'
'REG9-1592249572.1762*'
'REG9-1592249941.909*'
'REG9-1592332174.327*'
'REG9-1592332572.3206*'
'REG9-1592332952.8715*'
'REG9-1592333342.9595*'
'REG9-1592333867.4167*'
'REG9-1592334254.9468*'
'REG9-1592336008.7194*'
'REG9-1592336335.8635*'
'REG9-1592336696.0525*'
'REG9-1592416139.5859*'
'REG9-1592418059.503*'
'REG9-1592418456.0393*'
'REG9-1592419121.2236*'
'REG9-1592419475.8065*'
'REG9-1592419842.0265*'
'REG9-1592420216.2201*'
'REG9-1592420587.0205*'
'REG9-1592420923.2182*'
'REG9-1592693263.3015*'
'REG9-1592694086.1845*'
'REG9-1592694642.2488*'
'REG9-1592695000.8521*'
'REG9-1592695699.0628*'
'REG9-1592695709.4457*'
'REG9-1592696210.3241*'
'REG9-1592696212.5206*'
'REG9-1592696617.3318*'
'REG9-1592696742.4362*'
'REG9-1592697002.7231*'
'REG9-1592697010.4631*'
'REG9-1592697605.3197*'
'REG9-1592697607.6289*'
'REG9-1592698199.1063*'
'REG9-1592698225.3512*'
'REG9-1592863113.9142*'
'REG9-1592863486.4294*'
'REG9-1592864324.313*'
'REG9-1592864737.6979*'
'REG9-1592864999.0561*'
'REG9-1592865279.7418*'
'REG9-1592865716.2751*'
'REG9-1592865937.3216*'
'REG9-1592866223.7575*'
'REG9-1592866464.609*'
'REG9-1592866762.5168*'
'REG9-1592867107.0691*'
'REG9-1592867456.483*'
'REG9-1592867950.0476*'
'REG9-1592868207.007*'
'REG9-1592868981.096*'
'REG9-1592869268.3931*'
'REG9-1592869607.4451*'
'REG9-1592870129.032*'
'REG9-1592932850.5651*'
'REG9-1592933338.6099*'
'REG9-1592933696.2051*'
'REG9-1592934328.2727*'
'REG9-1592934600.4786*'
'REG9-1592935242.0255*'
'REG9-1592935512.3259*'
'REG9-1592935890.4553*'
'REG9-1592936151.8251*'
'REG9-1592936443.9434*'
'REG9-1592936951.1211*'
'REG9-1592938306.6838*'
'REG9-1592948793.9813*'
'REG9-1592949377.7194*'
'REG9-1592949624.3673*'
'REG9-1592949887.8824*'
'REG9-1592950089.9857*'
'REG9-1592950409.7423*'
'REG9-1592950633.1844*'
'REG9-1592950916.4317*'
'REG9-1592951644.328*'
'REG9-1592951898.7678*'
'REG9-1592952139.3183*'
'REG9-1592952352.58*'
'REG9-1592952612.6186*'
'REG9-1592952798.1252*'
'REG9-1592952982.6476*'
'REG9-1592953746.9693*'
'REG9-1592954067.6877*'
'REG9-1592954291.3619*'
'REG9-1592954503.2684*'
'REG9-1592954707.92*'
'REG9-1592954978.5309*'
'REG9-1592955341.0723*'
'REG9-1592955728.4646*'
'REG9-1592956118.6584*'
'REG9-1592956375.0661*'
'REG9-1592956566.9233*'
'REG9-1592956933.8366*'
'REG9-1592957158.6701*'
'REG9-1593021263.9512*'
'REG9-1593021741.3499*'
'REG9-1593024213.0233*'
'REG9-1593024570.9241*'
'REG9-1593024777.1765*'
'REG9-1593025125.8649*'
'REG9-1593025405.832*'
'REG9-1593025667.1615*'
'REG9-1593026088.8372*'
'REG9-1593026337.2193*'
'REG9-1593026619.0473*'
'REG9-1593026829.0988*'
'REG9-1593033482.9969*'
'REG9-1593033688.0246*'
'REG9-1593034001.1299*'
'REG9-1593034531.3759*'
'REG9-1593034777.7371*'
'REG9-1593035091.3316*'
'REG9-1593035369.919*'
'REG9-1593035611.2237*'
'REG9-1593035831.3228*'
'REG9-1593036172.3454*'
'REG9-1593036332.1993*'
'REG9-1593110073.8618*'
'REG9-1593110517.5256*'
'REG9-1593110701.939*'
'REG9-1593111676.5068*'
'REG9-1593111923.2431*'
'REG9-1593112127.7036*'
'REG9-1593112347.2699*'
'REG9-1593112556.0389*'
'REG9-1593112793.4942*'
'REG9-1593113260.3149*'
'REG9-1593113513.035*'
'REG9-1593113898.4714*'
'REG9-1593114263.811*'
'REG9-1593120537.3945*'
'REG9-1593121163.9545*'
'REG9-1593121436.1221*'
'REG9-1593122425.8171*'
'REG9-1593122955.6112*'
'REG9-1593123352.6321*'
'REG9-1593123944.5327*'
'REG9-1593124129.4575*'
'REG9-1593124318.377*'
'REG9-1593124741.6425*'
'REG9-1593124940.3517*'
'REG9-1593125725.4254*'
'REG9-1593126303.7046*'
'REG9-1593126651.0198*'
'REG9-1593195602.3243*'
'REG9-1593195911.3643*'
'REG9-1593196177.8466*'
'REG9-1593196359.878*'
'REG9-1593196577.6619*'
'REG9-1593196775.4185*'
'REG9-1593196961.2102*'
'REG9-1593197140.8795*'
'REG9-1593197353.8507*'
'REG9-1593197525.4286*'
'REG9-1593197973.9772*'
'REG9-1593198139.232*'
'REG9-1593198549.1232*'
'REG9-1593198851.6379*'
'REG9-1593199165.1475*'
'REG9-1593199388.1234*'
'REG9-1593199599.3418*'
'REG9-1593199816.6881*'
'REG9-1593200234.4481*'
'REG9-1593200655.3226*'
'REG9-1593207704.7528*'
'REG9-1593207940.9224*'
'REG9-1593208131.3224*'
'REG9-1593208349.5461*'
'REG9-1593208566.9383*'
'REG9-1593208996.5332*'
'REG9-1593209188.9888*'
'REG9-1593211574.7245*'
'REG9-1593212557.521*'
'REG9-1593213042.4596*'
'REG9-1593213468.3251*'
'REG9-1593213864.9294*'
'REG9-1593214075.1144*'
'REG9-1593214502.825*'
'REG9-1593456706.248*'
'REG9-1593456935.2952*'
'REG9-1593457161.4317*'
'REG9-1593457896.5936*'
'REG9-1593458352.7689*'
'REG9-1593458649.573*'
'REG9-1593458957.0313*'
'REG9-1593459265.8416*'
'REG9-1593459441.7832*'
'REG9-1593459725.8444*'
'REG9-1593459950.567*'
'REG9-1593466189.1892*'
'REG9-1593466420.8689*'
'REG9-1593466609.3203*'
'REG9-1593466941.8745*'
'REG9-1593467110.6626*'
'REG9-1593467364.1232*'
'REG9-1593467547.8952*'
'REG9-1593467797.731*'
'REG9-1593468061.7737*'
'REG9-1593468320.8087*'
'REG9-1593468519.5351*'
'REG9-1593468703.3009*'
'REG9-1593469037.9211*'
'REG9-1593469225.7848*'
'REG9-1593469441.3105*'
'REG9-1593469973.5788*'
'REG9-1593470209.0012*'
'REG9-1593470655.9806*'
'REG9-1593470832.3111*'
'REG9-1593471004.725*'
'REG9-1593471178.2208*'
'REG9-1593471332.9732*'
'REG9-1593472110.2784*'
'REG9-1593472378.9231*'
'REG9-1593472551.8303*'
'REG9-1593472744.124*'
'REG9-1593473047.7714*'
'REG9-1593553624.4236*'
'REG9-1593553934.8779*'
'REG9-1593554206.4064*'
'REG9-1593555808.3398*'
'REG9-1593556619.3268*'
'REG9-1593557748.4545*'
'REG9-1593558032.7904*'
'REG9-1593558472.6227*'
'REG9-1593558708.565*'
'REG9-1593641744.6763*'
'REG9-1593641970.7325*'
'REG9-1593642167.656*'
'REG9-1593642380.4515*'
'REG9-1593642566.9702*'
'REG9-1593643148.3962*'
'REG9-1593643685.0241*'
'REG9-1593643844.3062*'
'REG9-1593644026.5346*'
'REG9-1593644206.4033*'
'REG9-1593644421.9721*'
'REG9-1593644636.6765*'
'REG9-1593644852.4615*'
'REG9-1593645170.6516*'
'REG9-1593645444.0715*'
'REG9-1593645609.778*'
'REG9-1593645850.5366*'
'REG9-1593646056.1164*'
'REG9-1593646625.6253*'
'REG9-1593646983.825*'
'REG9-1593647190.323*'
'REG9-1593647585.0243*'
'REG9-1593712972.5501*'
'REG9-1593715730.4754*'
'REG9-1593715986.3235*'
'REG9-1593716171.7998*'
'REG9-1593716428.5538*'
'REG9-1593716619.5186*'
'REG9-1593716814.2521*'
'REG9-1593717020.8596*'
'REG9-1593717275.8059*'
'REG9-1593717633.7058*'
'REG9-1593717845.3276*'
'REG9-1593718039.9249*'
'REG9-1593718189.2349*'
'REG9-1593718380.2664*'
'REG9-1593718589.5279*'
'REG9-1593725716.497*'
'REG9-1593725887.5238*'
'REG9-1593726065.9175*'
'REG9-1593726243.4239*'
'REG9-1593726429.4351*'
'REG9-1593726646.4714*'
'REG9-1593726808.326*'
'REG9-1593727559.8236*'
'REG9-1593727783.5054*'
'REG9-1593728201.4464*'
'REG9-1593728500.7426*'
'REG9-1593728665.3424*'
'REG9-1593728778.6679*'
'REG9-1593728899.5998*'
'REG9-1593729022.9298*'
'REG9-1593729634.3381*'
'REG9-1593729761.2064*'
'REG9-1593729891.3144*'
'REG9-1593730031.0737*'
'REG9-1593730843.6417*'
'REG9-1593731038.3728*'
'REG9-1593731183.1112*'
'REG9-1593731342.1069*'
'REG9-1593731809.6012*'
'REG9-1593732007.0985*'
'REG9-1593732134.6031*'
'REG9-1593732438.8935*'
'REG9-1593732803.4296*'
'REG9-1593733022.209*'
'REG9-1593733252.1871*'
'REG9-1593813007.2241*'
'REG9-1593813585.6836*'
'REG9-1593813949.243*'
'REG9-1593814245.4149*'
'REG9-1593814474.6233*'
'REG9-1593815037.0666*'
'REG9-1593815424.6839*'
'REG9-1593815612.4965*'
'REG9-1593815994.8275*'
'REG9-1593816610.9297*'
'REG9-1593817037.8205*'
'REG9-1593817295.1695*'
'REG9-1594061059.4265*'
'REG9-1594061352.5244*'
'REG9-1594061589.9893*'
'REG9-1594061949.2117*'
'REG9-1594062491.4239*'
'REG9-1594062734.3681*'
'REG9-1594063140.2271*'
'REG9-1594063411.1299*'
'REG9-1594063597.7965*'
'REG9-1594063778.0499*'
'REG9-1594064088.9925*'
'REG9-1594064415.5036*'
'REG9-1594158665.7256*'
'REG9-1594158931.678*'
'REG9-1594159511.071*'
'REG9-1594159746.573*'
'REG9-1594159988.4523*'
'REG9-1594160339.0877*'
'REG9-1594160563.3278*'
'REG9-1594160911.6096*'
'REG9-1594161230.457*'
'REG9-1594161528.1885*'
'REG9-1594161908.6257*'
'REG9-1594164111.9253*'
'REG9-1594164537.4265*'
'REG9-1594165122.6897*'
'REG9-1594245629.7611*'
'REG9-1594245869.4669*'
'REG9-1594246051.9863*'
'REG9-1594246490.4513*'
'REG9-1594246869.7279*'
'REG9-1594247050.1843*'
'REG9-1594247262.4579*'
'REG9-1594247432.6639*'
'REG9-1594247616.029*'
)

# Bucle para buscar los archivos
for file in ${files[@]}; do
    if [ -e ./reg/$file ]; then
        # Mensajes de salida a consola
        echo "$file ENCONTRADO EN LA CARPETA Y ELIMINADO"
        # Eliminar el archivo encontrado
        rm reg/$file
    else
        echo "$file NO ENCONTRADO EN LA CARPETA"
    fi
done



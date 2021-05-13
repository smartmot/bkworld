var x = {
    h(){
        return new XMLHttpRequest();
    },
    r(dtfx,dtfd){
        const xr = this.h();
        if (!dtfd.t){
            xr.responseType = "text";
        }else{
            xr.responseType = dtfd.t;
        }
        xr.onreadystatechange = function () {
            if (xr.readyState === 4){
                dtfx.d(xr.response);
            }else{
                dtfx.e(xr.readyState,xr.responseText,xr.response);
            }
        };
        if (dtfx.p){
            xr.upload.onprogress = function (dprg) {
                var pxz = (dprg.loaded/dprg.total)*100;
                dtfx.p(dprg,pxz,xr);
            }
        }
        if (dtfd.ps){
            xr.onprogress = function () {
                dtfd.ps();
            }
        }
        if (dtfx.r){
            dtfx.r(xr);
        }
        xr.open(dtfd.m,dtfd.y, true);
        xr.send(dtfd.d);
    },
    d(obxjx,tar){
        obxjx.y = tar ? '/'+tar : '/ajx';
        return Object.assign({
            y:'/ajx',m:"POST", t:""
        },obxjx);
    },
    tar(attr){
        return "ajx/"+attr;
    }
};
const ob = {
    k(obj){
        return Object.keys(obj);
    },
    v(obj){
        return Object.values(obj);
    },
    a(obj){
        return 1;
    },
    fd(frm){
        return new FormData(frm);
    },
    /**
     *
     * @param objx
     * @returns {FormData}
     */
    df(objx){
        const mfdxs = new FormData();
        for(var i=0;i<ob.k(objx).length;i++){
            mfdxs.append(ob.k(objx)[i], objx[ob.k(objx)[i]]);
        }
        return mfdxs;
    }
};

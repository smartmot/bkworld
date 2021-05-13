const f = {
    d(form){
        return new FormData(form);
    },
    x(){
        return new XMLHttpRequest();
    },
    r(fn,options){
        const req = this.x();
        if (!options.t){
            req.responseType = "text";
        }else{
            req.responseType = options.t;
        }
        req.onreadystatechange = function (){
            if (req.readyState === 4){
                if (fn.d){
                    fn.d(req.response);
                }
            }else{
                if (fn.e){
                    fn.e(req.readyState,req.responseText,req.response);
                }
            }
        }
        if (fn.p){
            req.upload.onprogress = function (status) {
                let progress = (status.loaded/status.total)*100;
                fn.p(status,progress,req);
            }
        }
        if (fn.ps){
            req.onprogress = function () {
                fn.ps();
            }
        }
        if (fn.r){
            fn.r(req);
        }
        req.open(options.m,options.target, true);
        req.send(options.x);
    }
};
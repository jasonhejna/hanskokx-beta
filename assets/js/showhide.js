function pause(ms) {
ms += new Date().getTime();
while (new Date() < ms){}
}

function showstuff(name){
//set div vars
        var more=name;
        more += "_more";

        var less=name;
        less += "_less";

        var content=name;
        content += "_content";

        var title=name;
        title += "_title";


                if(document.getElementById(more).style.overflow.toLowerCase() == 'hidden')
                        {
                                if(document.getElementById(content).style.overflow.toLowerCase() == 'hidden')
                                        {
                                                document.getElementById(title).style.cursor="pointer";
                                                document.getElementById(more).style.overflow="visible";
                                                document.getElementById(more).style.height="auto";
                                                document.getElementById(more).style.cursor="pointer";
                                        }
                        }
                else
                        {
                                document.getElementById(more).style.overflow="hidden";
                                document.getElementById(more).style.height="0px";
                                document.getElementById(more).style.cursor="default";
                                document.getElementById(content).style.overflow="auto";
                                document.getElementById(content).style.position="relative";
                                document.getElementById(content).style.height="auto";
                                document.getElementById(title).style.cursor="default";
                        }


}

function hidestuff(name){
//set div vars
        var more=name;
        more += "_more";

        var less=name;
        less += "_less";

        var content=name;
        content += "_content";

        pause(100);
        document.getElementById(more).style.overflow="hidden";
        document.getElementById(more).style.height="0px";


}

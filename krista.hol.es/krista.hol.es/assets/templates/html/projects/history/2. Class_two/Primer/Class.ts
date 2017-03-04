declare module WebReports.Model.Primer {
    export interface Class extends Control {
        textView: Text;
        repeatClass: Primer.RepeatClass;

    }
}
module WebReports.Controls.Primer {
    export class Class extends UIComponent {
        protected expressionContextProvider: IExpressionContextProvider;
        constructor(private  model: WebReports.Model.Primer.Class, args: any) {
            super();
            this.expressionContextProvider = <IExpressionContextProvider>args[0];
        }
        public render(container: HTMLElement) {
            var containerMap = $("<div>")
                .attr("id", "containerMap")
                .appendTo(container);

            this.createText(containerMap);
            this.createLegend(containerMap);
        }
        private createText(container: JQuery): void {
            var legend = (<IUIComponent>ControlFactory.create(this.model.textView, this.expressionContextProvider));
            this.addChildComponent(legend, this);
            legend.render(container);
        }
        private createLegend(container: JQuery): void {
            var legend = (<IUIComponent>ControlFactory.create(this.model.repeatClass, this));
            this.addChildComponent(legend, this);
            legend.render(container);
        }

        public refresh(container: HTMLElement) {
            // Empty
        }
    }
}

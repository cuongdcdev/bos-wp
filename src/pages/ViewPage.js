import React, { useEffect, useState } from "react";
import { Widget } from "near-social-vm";
import { useParams } from "react-router-dom";
import { useQuery } from "../hooks/useQuery";
import { useHashRouterLegacy } from "../hooks/useHashRouterLegacy";

export default function ViewPage(props) {


  useHashRouterLegacy();

  const { widgetSrc } = useParams();
  const query = useQuery();
  const [widgetProps, setWidgetProps] = useState({});

  const src =
    window?.InjectedConfig?.forcedWidget ||
    widgetSrc ||
    window?.InjectedConfig?.defaultWidget ||
    props.defaultWidget ||
    false;

  // const viewSourceWidget = props.widgets.viewSource;

  // const injectedProps = window?.InjectedConfig?.props;
  const injectedProps = props.props;

  useEffect(() => {
    setWidgetProps(
      Object.assign(
        injectedProps || {},
        Object.fromEntries([...query.entries()])
      )
    );
  }, [query, injectedProps]);

  console.log("ViewPage: src: " + src + "| widget props:", widgetProps)
  return src ? <Widget key={Math.random()} src={src} props={widgetProps} /> : <></>;



}
